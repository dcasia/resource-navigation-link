<template>

    <div class="resource-navigation-link">

        <Card class="whitespace-nowrap overflow-x-auto flex flex-row items-center md:justify-center">

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

    export default {
        props: [ 'card' ],
        setup() {

            return {
                component: link => link.external ? 'a' : 'Link',
                active: link => window.location.pathname.endsWith(link.url),
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
