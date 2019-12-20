<style lang="scss" module>
.root {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 0.25em;
  background-color: $color-gray_cold800;
  background-image: $color-gray_cold-gradient_light;
  box-shadow: 0 1em 2em -1em rgba($color-blue900, 0.33);
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;

  a {
    color: $color-primary500;
  }

  a:focus {
    outline: none;
  }
}

.bg,
.overlay,
.overlayHover {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 0.25em;
  background-size: cover;
  background-position: top center;
}

.bg {
  z-index: 0;
}

.overlay,
.overlayHover {
  z-index: 1;
  transition-property: opacity;
  transition-duration: 200ms;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

.overlay {
  transition-delay: 0ms;
}

.overlayHover {
  opacity: 0;
  transition-delay: 100ms;
}

.root:hover {
  .overlay {
    opacity: 0;
    transition-delay: 100ms;
  }

  .overlayHover {
    opacity: 1;
    transition-delay: 0ms;
  }
}

.inner {
  z-index: 2;
  position: relative;
  display: block;
  width: auto;
  height: auto;
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
  color: $color-white;
  padding: $space-small;
  text-align: center;
  font-size: $font-size-h5;

  @media ($media-min-small) {
    font-size: $font-size-h4;
  }

  @media ($media-min-medium) {
    font-size: $font-size-h3;
    padding: $space-base;
  }

  @media ($media-min-large) {
    font-size: $font-size-h4;
  }

  @media ($media-min-xlarge) {
    font-size: $font-size-h3;
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
    margin-top: 0;
    margin-bottom: 0;
    display: inline-block;
    vertical-align: middle;
  }

  a {
    color: inherit;
    text-decoration: none;

    &:hover,
    &:focus {
      color: $color-primary500;
      text-decoration: none;

      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      span {
        text-decoration: underline;
      }
    }
  }

  img {
    width: 2em;
    height: auto;
  }

  span {
    &:first-child {
      margin-right: $space-tiny;
    }

    &:last-child {
      margin-left: $space-tiny;
    }

    &:first-child:last-child {
      margin-left: 0;
      margin-right: 0;
    }
  }
}

.content {
  color: $color-gray_cold000;
  padding: 0 $space-small $space-small;
  opacity: 0;
  height: 0;
  transition-property: transform, opacity, height;
  transition-duration: 200ms;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transform: translateY(50%);

  @media ($media-min-medium) {
    padding: 0 $space-base $space-base;
  }
}

.root:hover .content {
  opacity: 1;
  transform: translateY(0%);
  height: 8em;
}
</style>
<template>
  <div :class="$style.root">
    <div :class="$style.bg" v-if="image" :style="imageStyle"></div>
    <div :class="$style.overlay" :style="overlayStyle"></div>
    <div :class="$style.overlayHover" :style="overlayHoverStyle"></div>

    <div :class="$style.inner">
      <div :class="$style.title" v-if="$slots.title || $slots.icon">
        <nuxt-link v-if="link" slot="links" :to="link">
          <span aria-hidden="true" v-if="$slots.icon"><slot name="icon"/></span>
          <slot name="title" />
        </nuxt-link>
        <slot v-if="!link" name="icon" />
        <slot v-if="!link" name="title" />
      </div>
      <div :class="$style.content" v-if="$slots.content || $slots.link">
        <slot name="content" />
        <div :class="$style.link">
          <slot name="link" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    overlayStyle() {
      return 'background: ' + this.overlay + ';'
    },
    overlayHoverStyle() {
      return 'background: ' + this.overlayHover + ';'
    },
    imageStyle() {
      return "background-image: url('" + this.image + "');"
    }
  },
  props: {
    image: {
      type: String,
      required: false
    },
    overlay: {
      type: String,
      required: false
    },
    overlayHover: {
      type: String,
      required: false
    },
    link: {
      type: String,
      required: false
    }
  }
}
</script>
