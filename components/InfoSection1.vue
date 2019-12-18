<style lang="scss" module>
.root {
  display: block;
}

.inner {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: flex-start;
  align-items: center;

  @media ($media-min-large) {
    flex-direction: row;
  }
}

.header {
  width: 100%;

  @media ($media-min-large) {
    padding-right: $space-medium;
    width: 40%;
  }

  @media ($media-min-xlarge) {
    width: 50%;
  }
}

.items {
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  padding: 0 0 $space-base;

  @media ($media-min-small) {
    padding: $space-small 0 $space-base;
  }

  @media ($media-min-large) {
    width: 60%;
  }

  @media ($media-min-xlarge) {
    width: 50%;
  }
}

.item {
  padding: $space-base 0 0;
  width: 100%;
  max-width: 100%;
  display: block;

  @media ($media-min-small) {
    width: 50%;
    padding: $space-small;

    // Left
    &:nth-child(2n + 1) {
      padding-left: 0;
    }

    // Right
    &:nth-child(2n) {
      padding-right: 0;
      transform: translateY(50%);
    }
  }
}
</style>
<template>
  <section :class="$style.root">
    <div :class="$style.inner">
      <header :class="$style.header">
        <slot name="header" />
      </header>
      <ul :class="$style.items">
        <li :class="$style.item">
          <slot name="item-1" />
        </li>
        <li :class="$style.item">
          <slot name="item-2" />
        </li>
        <li :class="$style.item">
          <slot name="item-3" />
        </li>
      </ul>
    </div>
  </section>
</template>
<script>
export default {}
</script>
