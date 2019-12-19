<style lang="scss" module>
.root {
  border-radius: 0.25em;
  background-color: $color-white;
  border: 1px solid $color-black;

  a {
    color: $color-primary500;
  }

  a:focus {
    outline: none;
  }
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
  color: $color-fg-headings;
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
  color: $color-fg-body;
  padding: 0 $space-small $space-small;

  @media ($media-min-medium) {
    padding: 0 $space-base $space-base;
  }
}
</style>
<template>
  <div :class="$style.root">
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
  props: {
    link: {
      type: String,
      required: false
    }
  }
}
</script>
