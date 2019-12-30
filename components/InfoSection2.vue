<style lang="scss" module>
.root {
  display: block;

  &:hover .shadow {
    animation-play-state: running;
  }
}

.inner {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: flex-start;
  align-content: flex-start;
  align-items: center;

  @media ($media-min-large) {
    flex-direction: row;
    justify-content: flex-start;
  }
}

.info {
  width: #{$size-base * 32}em;
  max-width: 100%;
  position: relative;
  margin-bottom: #{$size-base * 4em};
}

.shadow {
  position: absolute;
  top: 5em;
  left: 10em;
  right: 0;
  margin: auto;
  width: #{$size-base * 32}em;
  max-width: 100%;
  height: 100%;
  z-index: -1;
  background-size: 10px;
  filter: grayscale(100%) contrast(300%);
  background-image: url($element_dots);
  opacity: 0.1;
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
  position: relative;
  width: 100%;
  display: block;

  @media ($media-min-large) {
    top: -#{$size-base * 4}em;
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
        <div :class="$style.shadow"></div>
      </div>
      <div :class="$style.items">
        <slot name="items" />
      </div>
    </div>
  </section>
</template>
<script>
export default {}
</script>
