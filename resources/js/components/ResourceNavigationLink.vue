<template>

    <Card class="resource-navigation-link flex flex-row items-center justify-center">

      <component
          v-for="(resource, key) of card.resources"
          :is="`resource-navigation-link-${resource.component}`"
          :key="key"
          :resource="resource"
          class="p-6 flex-1 text-center cursor-pointer leading-tight text-sm transition"
          :class="[
              { 'border-b-2 first:rounded-l-lg last:rounded-r-lg': true },
              { 'hover:border-[rgba(var(--colors-primary-500))]': true },
              { 'border-transparent': active(resource) === false },
              { 'inertia-link-active font-bold border-[rgba(var(--colors-primary-500))]': active(resource) },
          ]"
      />

    </Card>

</template>

<script>


export default {

  props: [
      'card'
  ],

  methods: {
    active(resource) {
      return this.$page.url === resource.url
    }
  }

}

</script>

<style scoped>

.resource-navigation-link {
  min-height: auto;
}

</style>
