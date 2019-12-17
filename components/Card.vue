<style lang="scss" module>
.root {
  border-radius: 0.25em;
  background-color: $color-white;
  border: 1px solid $color-black;
}

.inner {
  box-shadow: 0 1em 2em -1em rgba($color-blue900, 0.33);
}

.title,
.content {
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  p,
  span {
    color: inherit;
  }

  :first-child {
    margin-top: 0;
  }

  :last-child {
    margin-bottom: 0;
  }
}

.title {
  padding: $space-small;

  @media ($media-min-medium) {
    padding: $space-base;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  p,
  span,
  img {
    display: inline-block;
  }
}

.content {
  padding: 0 $space-small $space-small;

  @media ($media-min-medium) {
    padding: 0 $space-base $space-base;
  }
}
</style>
<template>
  <div :class="$style.root">
    <div :class="$style.inner">
      <div :class="$style.title">
        <slot name="icon" />
        <slot name="title" />
      </div>
      <div :class="$style.content"><slot name="content" /></div>
    </div>
  </div>
</template>
<script>
export default {}
</script>
