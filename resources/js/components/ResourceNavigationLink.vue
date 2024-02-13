<template>

    <div class="resource-navigation-link">

        <Card class="whitespace-nowrap overflow-x-hidden flex flex-row items-center md:justify-center">

            <component
                v-for="(link, key) of card.links"
                :is="component(link)"
                :key="key"
                :href="link.url"
                :target="target(link)"
                class="p-4 pt-6 flex-1 text-center cursor-pointer leading-tight text-sm transition"
                :class="[
                    { 'border-b-2 first:rounded-l-lg last:rounded-r-lg': true },
                    { 'hover:border-[rgba(var(--colors-primary-500))]': true },
                    { 'border-transparent': active(link) === false },
                    { 'inertia-link-active font-bold border-[rgba(var(--colors-primary-500))]': active(link) },
                ]">

                {{ link.label }}

            </component>

        </Card>

    </div>

</template>

<script>
    import { ref, onMounted, onUnmounted } from 'vue';

    export default {
        props: [ 'card' ],
        setup() {
          const currentSearch = ref(window.location.search);

          const checkSearchChange = () => {
            const search = window.location.search;
            if (currentSearch.value !== search) {
              currentSearch.value = search;
            }
          };

          const decodeFilters = (link) => {
            const params = new URLSearchParams(currentSearch.value);
            const encoded = params.get(`${link.uriKey}_filter`);
            return encoded ? JSON.parse(atob(encoded)) : null;
          };

          const isLinkActive = (link) => {
            const filters = decodeFilters(link);
            if (!filters || !link.activeFilter || !link.activeValue) return window.location.pathname.endsWith(link.url);
            return filters.some(filter => {
              const key = Object.keys(filter)[0];
              const value = filter[key];
              return key === link.activeFilter && value == link.activeValue;
            });
          };

          onMounted(() => {
            Nova.$on('filter-changed', checkSearchChange)
            Nova.$on('filter-reset', checkSearchChange)
          });

          onUnmounted(() => {
            Nova.$off('filter-changed', checkSearchChange)
            Nova.$off('filter-reset', checkSearchChange)
          });

            return {
                component: link => link.external ? 'a' : 'Link',
                active: link => isLinkActive(link),
                target: link => link.openInNewTab ? '_blank' : '_self'
            }

        },
    }

</script>

<style scoped>

    .resource-navigation-link {

        min-height: auto;

        &:last-child.resource-navigation-link {
            margin-bottom: 1rem;
        }

    }

</style>
