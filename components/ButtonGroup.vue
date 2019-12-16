<style lang="scss" module>
.root {
  display: block;

  @media ($media-min-small) {
    margin-left: -$space-small;
  }

  > a,
  > button {
    margin-top: $space-base;
    display: block;

    @media ($media-min-small) {
      display: inline-block;
      margin: $space-base $space-small 0;
    }
  }
}
</style>
<template>
  <div :class="$style.root">
    <slot />
  </div>
</template>
<script>
export default {}
</script>
