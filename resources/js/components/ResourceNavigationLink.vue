<template>

    <card class="flex flex-row items-center justify-center">

        <template v-for="(resource, key) of card.resources">

            <a :key="key" v-if="resource.type === 'external_link'"
               :class="linkClass"
               :href="resource.url"
               :target="resource.target">

                {{ resource.label }}

            </a>

            <router-link :class="linkClass" :key="key" :to="resource.router" :target="resource.target">

                {{ resource.label }}

            </router-link>

        </template>


    </card>

</template>

<script>

    export default {
        name: 'ResourceNavigationLink',
        props: [
            'card',
            'resource',
            'resourceId',
            'resourceName'
        ],
        computed: {
            linkClass() {
                return 'p-6 dim flex-1 text-center no-underline text-primary border-b-2 cursor-pointer border-transparent hover:border-90'
            }
        },
        mounted() {

            /**
             * Nova sort the cards per size, smaller comes first, so to keep this card above everything,
             * It starts with the smallest possible size, and then change resize itself to the largest
             */
            this.$parent.$el.classList.add('w-full')

        }
    }

</script>


<style lang="scss" scoped>

    .card-panel {

        height: auto;

    }

    .card {

        a:first-child {
            border-bottom-left-radius: .5rem;
        }

        a:last-child {
            border-bottom-right-radius: .5rem;
        }

        a.router-link-exact-active {
            border-color: var(--primary);
        }

    }

</style>
