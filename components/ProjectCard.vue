<style lang="scss" module>
.root {
  position: relative;
  width: 100%;
  max-width: 100%;
  height: 100%;
  border-radius: 0.33em;
  background-color: $color-gray_cold300;
  box-shadow: 0 1em 2em -1em rgba($color-blue900, 0.33);
  display: flex;
  flex-direction: column;
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
  transform: scale(1);
  transition-property: transform;
}

.bg,
.overlay,
.overlayHover {
  transition-duration: 200ms;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

.overlay,
.overlayHover {
  z-index: 1;
  transition-property: opacity;
}

.overlay {
  opacity: 0;
  transition-delay: 0ms;

  @media ($media-min-medium) {
    opacity: 1;
  }
}

.overlayHover {
  opacity: 1;
  transition-delay: 100ms;

  @media ($media-min-medium) {
    opacity: 0;
  }
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

  .bg {
    transform: scale(1.1);
  }
}

.inner {
  z-index: 2;
  position: relative;
  width: 100%;
  max-width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 300ms;
  opacity: 1;

  @media ($media-min-medium) {
    opacity: 0;
  }
}

div.inner {
  transition-property: transform, opacity, height;
  transform: translateY(0%);

  @media ($media-min-medium) {
    transform: translateY(-50%);
  }
}

a.inner {
  transition-property: opacity;
  width: 100%;
  height: 100%;
}

.root:hover .inner {
  opacity: 1;
}

.root:hover div.inner {
  transform: translateY(0%);
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
  width: 100%;
  max-width: 100%;
  overflow: hidden;
  word-break: break-word;
  font-size: $font-size-h5;

  @media ($media-min-small) {
    font-size: $font-size-h4;
  }

  @media ($media-min-medium) {
    font-size: $font-size-h3;
    padding: $space-small $space-base;
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

  @media ($media-min-medium) {
    padding: 0 $space-base $space-base;
  }
}

.link {
  color: $color-white;
}
</style>
<template>
  <div :class="$style.root" @mouseenter="hover">
    <div :class="$style.bg" v-if="image" :style="imageStyle"></div>
    <div :class="$style.overlay" :style="overlayStyle"></div>
    <div :class="$style.overlayHover" :style="overlayHoverStyle"></div>

    <div
      :class="$style.inner"
      v-if="$slots.title || $slots.icon || $slots.content"
    >
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
    <nuxt-link
      :class="$style.inner"
      v-else-if="title && link"
      slot="links"
      :to="link"
    >
      <div :class="$style.title">
        <h4 :data-title="title">{{ title }}</h4>
      </div>
    </nuxt-link>
  </div>
</template>
<script>
let running = false

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
    title: {
      type: String,
      required: false
    },
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
  },
  methods: {
    hover: function(evt) {
      const element = evt.target
      const titleElement = element
        .querySelector('.' + this.$style.title)
        .querySelector('h1,h2,h3,h4,h5,h6')
      const title = titleElement.getAttribute('data-title')
      let titleSplit = title.split('')

      // The time for each frame. The longer the title, the shorter each frame is
      const animationFrameTime = Math.round(Math.pow(1.025, -title.length) * 50)

      titleElement.innerHTML = ''

      // If we already have an animation running, stop it and start over
      if (running) {
        clearTimeout(running)
      }

      function animate() {
        titleSplit.length > 0
          ? (titleElement.innerHTML += titleSplit.shift())
          : clearTimeout(running)

        running = setTimeout(animate, animationFrameTime)
      }

      // Start the animation
      animate()
    }
  }
}
</script>
