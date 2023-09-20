<template>
  <a :href="resource.url" :target="target(resource)">
    {{ resource.label }}
  </a>
</template>

<script>

export default {
  props: {
    resource: {
      type: Object,
      required: true,
    },
  },

  methods: {
    target(resource) {
      return resource.openInNewTab
          ? '_blank'
          : 'self'
    }
  }
}

</script>
