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

.info {
  width: 100%;

  @media ($media-min-large) {
    padding-right: $space-medium;
    width: 40%;
  }

  @media ($media-min-xlarge) {
    width: 50%;
  }
}

.header {
  h2 {
    color: $color-fg-pre-headings;
    margin: 0;
    font-size: $font-size-h5;
    font-family: $font-family-body;
    font-weight: $font-weight-body;

    @media ($media-min-medium) {
      font-size: $font-size-h4;
    }
  }

  h3 {
    margin-top: 1rem;
    margin-bottom: 0;
    font-size: $font-size-h3;

    @media ($media-min-medium) {
      font-size: $font-size-h2;
    }
  }
}

.content {
  margin-top: 2em;
  margin-bottom: 2em;

  p:first-child:last-child {
    margin: 0;
  }

  p:last-child {
    margin-bottom: 0;
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
      <div :class="$style.info">
        <header :class="$style.header">
          <slot name="header" />
        </header>
        <div :class="$style.content">
          <slot name="content" />
        </div>
        <div :class="$style.footer">
          <slot name="footer" />
        </div>
      </div>
      <ul :class="$style.items" v-if="$slots['item-1']">
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
