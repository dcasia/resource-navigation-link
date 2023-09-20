<template>

    <Card class="resource-navigation-link flex flex-row items-center justify-center">

      <component
          v-for="(link, key) of card.links"
          :is="component(link)"
          :key="key"
          :href="link.url"
          :target="target(link)"
          class="p-6 flex-1 text-center cursor-pointer leading-tight text-sm transition"
          :class="[
              { 'border-b-2 first:rounded-l-lg last:rounded-r-lg': true },
              { 'hover:border-[rgba(var(--colors-primary-500))]': true },
              { 'border-transparent': active(link) === false },
              { 'inertia-link-active font-bold border-[rgba(var(--colors-primary-500))]': active(link) },
          ]"
      >
        {{ link.label }}
      </component>

    </Card>

</template>

<script>


export default {

  props: [
      'card'
  ],

  methods: {
    component(link) {
      if (link.external) {
        return 'a'
      }

      return 'Link'
    },

    active(link) {
      return this.$page.url === link.url
    },

    target(link) {
      if (link.openInNewTab) {
        return '_blank'
      }

      return '_self'
    }
  }

}

</script>

<style scoped>

.resource-navigation-link {
  min-height: auto;
}

</style>
