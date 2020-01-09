<style lang="scss" module>
p:first-of-type:last-of-type {
  margin-bottom: 0;
}

.layoutdefault,
.layoutcols-1-3,
.layoutcols-3-1,
.layoutcols-2,
.layoutcols-3,
.layouttext {
  display: block;
  width: $page-width;
  max-width: 100%;
  padding: 0 $space-small;

  @media ($media-min-medium) {
    padding: 0 $space-base;
  }

  @media ($media-min-large) {
    padding: 0 $space-large;
  }
}

.layoutfull {
  display: block;
  width: 100%;
  max-width: 100%;
}

.layouttext {
  width: #{$size-base * 33}em;
  overflow: hidden;

  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  p {
    word-break: break-word;
  }
}

.layoutcols-1-3,
.layoutcols-3-1,
.layoutcols-2,
.layoutcols-3 {
  display: grid;
  grid-template-columns: 1fr;
  grid-gap: $space-base;
}

.layoutcols-2 {
  @media ($media-min-medium) {
    grid-template-columns: 1fr 1fr;
  }
}

.layoutcols-3 {
  @media ($media-min-medium) {
    grid-template-columns: 1fr 1fr 1fr;
  }
}

.layoutcols-1-3 {
  @media ($media-min-medium) {
    grid-template-columns: 1fr 2fr;
  }
}

.layoutcols-3-1 {
  @media ($media-min-medium) {
    grid-template-columns: 2fr 1fr;
  }
}

.padded-extra {
  padding: $space-small;

  @media ($media-min-medium) {
    padding: $space-base;
  }

  @media ($media-min-large) {
    padding: $space-large;
  }
}

.margin-default {
  margin: auto;
}

.margin-extra {
  margin: $space-base 0;

  @media ($media-min-medium) {
    margin: $space-large 0;
  }
}

.bglight {
  background-color: $color-gray_cold100;
}

.bgdark {
  color: $color-gray_cold100;
  background-color: $color-gray_cold900;
  background-image: $color-gray_cold-gradient_light;

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    color: $color-white;
  }
}

img {
  width: 100%;
  height: auto;
}

.sticky-0 > :nth-child(1) > :first-child {
  @media ($media-min-medium) {
    position: sticky;
    top: $space-xlarge;
  }
}

.sticky-1 > :nth-child(2) > :first-child {
  @media ($media-min-medium) {
    position: sticky;
    top: $space-xlarge;
  }
}

.sticky-2 > :nth-child(3) > :first-child {
  @media ($media-min-medium) {
    position: sticky;
    top: $space-xlarge;
  }
}

.border-0 > :nth-child(1) > :first-child {
  border: 1px solid $color-gray_cold200;
}

.border-1 > :nth-child(2) > :first-child {
  border: 1px solid $color-gray_cold200;
}

.border-2 > :nth-child(3) > :first-child {
  border: 1px solid $color-gray_cold200;
}

.width-0-small > :nth-child(1) > :first-child,
.width-1-small > :nth-child(2) > :first-child,
.width-2-small > :nth-child(3) > :first-child {
  width: #{$size-base * 2}em;
}

.width-0-medium > :nth-child(1) > :first-child,
.width-1-medium > :nth-child(2) > :first-child,
.width-2-medium > :nth-child(3) > :first-child {
  width: #{$size-base * 4}em;
}

.width-0-large > :nth-child(1) > :first-child,
.width-1-large > :nth-child(2) > :first-child,
.width-2-large > :nth-child(3) > :first-child {
  width: #{$size-base * 8}em;
}

.hAlign-0-start > :nth-child(1),
.hAlign-1-start > :nth-child(2),
.hAlign-2-start > :nth-child(3) {
  justify-self: start;
}

.hAlign-0-center > :nth-child(1),
.hAlign-1-center > :nth-child(2),
.hAlign-2-center > :nth-child(3) {
  justify-self: center;
}

.hAlign-0-end > :nth-child(1),
.hAlign-1-end > :nth-child(2),
.hAlign-2-end > :nth-child(3) {
  justify-self: end;
}

.vAlign-0-start > :nth-child(1),
.vAlign-1-start > :nth-child(2),
.vAlign-2-start > :nth-child(3) {
  align-self: start;
}

.vAlign-0-center > :nth-child(1),
.vAlign-1-center > :nth-child(2),
.vAlign-2-center > :nth-child(3) {
  align-self: center;
}

.vAlign-0-end > :nth-child(1),
.vAlign-1-end > :nth-child(2),
.vAlign-2-end > :nth-child(3) {
  align-self: end;
}

blockquote {
  position: relative;
  margin: $space-small auto;
  padding: 0;

  &::before,
  &::after {
    font-style: italic;
    z-index: 0;
    color: $color-gray_cold200;
    position: absolute;
    font-size: 15em;
    line-height: 1rem;
    text-align: center;
  }

  &::before {
    content: '“';
    top: 4rem;
    left: -3rem;
  }

  &::after {
    content: '”';
    bottom: -4rem;
    right: 1rem;
  }

  p {
    position: relative;
    z-index: 1;
    font-style: italic;
    margin: 0;
    font-size: $font-size-h5;

    @media ($media-min-medium) {
      font-size: $font-size-h4;
    }
  }

  & + p,
  & + p + p,
  & + p + p + p {
    position: relative;
    margin: 0;
  }

  // Picture
  & + p {
    display: inline-block;
    width: #{$size-base * 2}em;
    height: #{$size-base * 2}em;

    img {
      border-radius: 100%;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }

  // Name
  & + p + p {
    font-size: 16px;
    display: inline-block;
    height: #{$size-base * 0.5}rem;
    top: -#{$size-base * 0.25}rem;
    line-height: #{$size-base * 0.5}rem;
    padding-left: #{$size-base * 0.5}rem;
    font-weight: 400;
  }

  // Title
  & + p + p + p {
    font-size: 16px;
    color: $color-gray_cold700;
    display: block;
    top: -#{$size-base * 0.9}rem;
    padding-bottom: #{$size-base * 1}rem;
    padding-left: #{$size-base * 2.7}rem; // 2 + 0.5 (+0.2 for HTML whitespace)
    height: #{$size-base * 0.5}rem;
    line-height: #{$size-base * 0.5}rem;
  }
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
    let classList = [
      this.padded ? this.$style['padded-extra'] : null,
      this.margin ? this.$style['margin-extra'] : this.$style['margin-default'],
      this.$style['layout' + this.type],
      this.$style['bg' + this.bg]
    ]

    if (this.sticky != null) {
      let stickyClasses = []
      this.sticky.forEach(sticky => {
        stickyClasses.push(this.$style['sticky-' + sticky])
      })
      classList.push(stickyClasses)
    }

    if (this.borders != null) {
      let borderClasses = []
      this.borders.forEach(border => {
        borderClasses.push(this.$style['border-' + border])
      })
      classList.push(borderClasses)
    }

    if (this.widths != null) {
      let widthClasses = []
      this.widths.forEach((width, i) => {
        widthClasses.push(this.$style['width-' + i + '-' + width])
      })
      classList.push(widthClasses)
    }

    if (this.hAlign != null) {
      let hAlignClasses = []
      this.hAlign.forEach((hAlign, i) => {
        hAlignClasses.push(this.$style['hAlign-' + i + '-' + hAlign])
      })
      classList.push(hAlignClasses)
    }

    if (this.vAlign != null) {
      let vAlignClasses = []
      this.vAlign.forEach((vAlign, i) => {
        vAlignClasses.push(this.$style['vAlign-' + i + '-' + vAlign])
      })
      classList.push(vAlignClasses)
    }

    return {
      classList
    }
  },
  props: {
    type: {
      type: String,
      required: false,
      default: 'default',
      validator: function(value) {
        const passes =
          [
            'default',
            'full',
            'text',
            'cols-2',
            'cols-3',
            'cols-3-1',
            'cols-1-3'
          ].indexOf(value) !== -1

        if (!passes) {
          console.warn(
            "The prop 'type' for the 'Layout' component needs to be either 'default', 'full', 'text', 'cols-2', 'cols-3', 'cols-3-1' or 'cols-1-3'"
          )
        }

        return passes
      }
    },
    bg: {
      type: String,
      required: false,
      default: 'none',
      validator: function(value) {
        const passes = ['none', 'light', 'dark'].indexOf(value) !== -1

        if (!passes) {
          console.warn(
            "The prop 'bg' for the 'Layout' component needs to be either 'none', 'light' or 'dark'"
          )
        }

        return passes
      }
    },
    padded: {
      type: Boolean,
      required: false,
      default: false
    },
    margin: {
      type: Boolean,
      required: false,
      default: false
    },
    sticky: {
      type: Array,
      required: false,
      default: null
    },
    borders: {
      type: Array,
      required: false,
      default: null
    },
    widths: {
      type: Array,
      required: false,
      default: null
    },
    hAlign: {
      type: Array,
      required: false,
      default: null
    },
    vAlign: {
      type: Array,
      required: false,
      default: null
    }
  }
}
</script>
