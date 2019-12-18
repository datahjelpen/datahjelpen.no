<style lang="scss" module>
.layoutdefault {
  display: block;
  width: $page-width;
  max-width: 100%;
  padding: 0 $space-small;
  margin: auto;

  @media ($media-min-medium) {
    padding: 0 $space-base;
  }

  @media ($media-min-large) {
    flex-direction: row;
    padding: 0 $space-large;
  }
}

.layoutfull {
  display: block;
  width: 100%;
  max-width: 100%;
}
</style>
<template>
  <div :class="classList">
    <slot />
  </div>
</template>
<script>
export default {
  data() {
    return { classList: this.$style['layout' + this.type] }
  },
  props: {
    type: {
      type: String,
      required: false,
      default: 'default',
      validator: function(value) {
        // The value must match one of these strings
        const passes = ['default', 'full'].indexOf(value) !== -1

        if (!passes) {
          console.warn(
            'The prop "type" for the "Layout" component needs to be either "default" or "full"'
          )
        }

        return ['default', 'full'].indexOf(value) !== -1
      }
    }
  }
}
</script>
