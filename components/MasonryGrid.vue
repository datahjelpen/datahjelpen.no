<style lang="scss" module>
.items {
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;

  @supports (display: grid) {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: repeat(10, auto);
    grid-gap: #{$size-small * 1em};

    @media ($media-min-medium) {
      grid-gap: #{$size-base * 1em};
    }

    @media ($media-min-large) {
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-rows: repeat(3, auto);
      grid-column-gap: #{$size-base * 1em};
    }
  }
}

.item {
  width: 100%;
  max-width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  height: #{$size-small * 20em};
  margin-top: $space-base;

  @media ($media-min-medium) {
    width: 45%;
    margin-right: $space-base;
  }

  @media ($media-min-large) {
    width: 30%;
  }

  @supports (display: grid) {
    width: 100%;
    margin: 0;

    @media ($media-max-large) {
      // Big first line
      &:nth-child(1) {
        grid-row: 1/3;
      }

      // Big second line
      &:nth-child(4),
      &:nth-child(5) {
        grid-row: 3/5;
      }

      // Big third line
      &:nth-child(8) {
        grid-row: 5/7;
        grid-column: 2/3;
      }

      // Wide
      &:nth-child(9) {
        height: #{$size-base * 10em};
        grid-column: 1/3;
      }
    }

    @media ($media-max-medium) {
      // Big
      &:nth-child(1),
      &:nth-child(4),
      &:nth-child(5),
      &:nth-child(8) {
        height: #{$size-small * 20em};
      }

      // First big item on second line
      &:nth-child(4) {
        margin-top: -#{$size-small * 3em};
      }

      // Small
      &:nth-child(2),
      &:nth-child(3),
      &:nth-child(6),
      &:nth-child(7) {
        height: #{$size-small * 10em};
      }

      // First small on first line
      &:nth-child(2) {
        margin-top: #{$size-small * 2em};
      }

      // Small on third line
      &:nth-child(6) {
        margin-top: -#{$size-small * 3em};
      }

      &:nth-child(7) {
        margin-top: -#{$size-small * 2em};
      }

      // Wide
      &:nth-child(9) {
        height: #{$size-small * 10em};
      }
    }

    @media ($media-min-medium) and ($media-max-large) {
      // Big
      &:nth-child(1),
      &:nth-child(4),
      &:nth-child(5),
      &:nth-child(8) {
        height: #{$size-base * 20em};
      }

      // First big item on second line
      &:nth-child(4) {
        margin-top: -#{$size-base * 3em};
      }

      // Small
      &:nth-child(2),
      &:nth-child(3),
      &:nth-child(6),
      &:nth-child(7) {
        height: #{$size-base * 10em};
      }

      // First small on first line
      &:nth-child(2) {
        margin-top: #{$size-base * 2em};
      }

      // Small on third line
      &:nth-child(6) {
        margin-top: -#{$size-base * 3em};
      }

      &:nth-child(7) {
        margin-top: -#{$size-base * 2em};
      }

      // Wide
      &:nth-child(9) {
        height: #{$size-base * 10em};
      }
    }

    @media ($media-min-large) {
      // Big
      &:nth-child(2n) {
        height: #{$size-base * 20em};
      }

      // Big on first line
      &:nth-child(9n-7) {
      }
      // Big on second line
      &:nth-child(9n-5),
      &:nth-child(9n-3) {
        margin-top: -#{$size-base * 4em};
      }

      // Big on third line
      &:nth-child(9n-1) {
        margin-top: -#{$size-base * 6em};
      }

      // Small
      &:nth-child(2n + 1) {
        height: #{$size-base * 10em};
      }

      // Small on first line
      &:nth-child(9n-8),
      &:nth-child(9n-6) {
        margin-top: #{$size-base * 6em};
      }

      // Small on second line
      &:nth-child(9n-4) {
      }

      // Small on third line
      &:nth-child(9n-2),
      &:nth-child(9n) {
      }
    }
  }
}
</style>
<template>
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
    <li :class="$style.item">
      <slot name="item-4" />
    </li>
    <li :class="$style.item">
      <slot name="item-5" />
    </li>
    <li :class="$style.item">
      <slot name="item-6" />
    </li>
    <li :class="$style.item">
      <slot name="item-7" />
    </li>
    <li :class="$style.item">
      <slot name="item-8" />
    </li>
    <li :class="$style.item">
      <slot name="item-9" />
    </li>
  </ul>
</template>
<script>
export default {}
</script>
