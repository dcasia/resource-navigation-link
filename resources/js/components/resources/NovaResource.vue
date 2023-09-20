<template>
  <Link :href="$url(resource.url)">
    {{ resource.label }}
  </Link>
</template>

<script>

export default {
  props: {
    resource: {
      type: Object,
      required: true,
    },
  }
}

</script>
