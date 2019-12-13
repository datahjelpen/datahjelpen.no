<style lang="scss" module>
@import 'NavigationBar';
</style>
<template>
  <nav
    :class="$style.root"
    :aria-expanded="this.$store.state.navigation.navExtended ? 'true' : 'false'"
  >
    <div :class="$style.inner">
      <div :class="$style.logo">
        <slot name="logo" />
      </div>
      <div :class="$style.links">
        <div :class="$style.linksInner">
          <div :class="$style.topBar">
            <div :class="$style.logo">
              <slot name="logo" />
            </div>
            <div :class="$style.close" @click="toggleMenu">
              <CloseIcon />
            </div>
          </div>
          <div :class="$style.mainLinks">
            <slot name="links" />
          </div>
          <div :class="$style.otherLinks">
            <div :class="$style.otherLinksGroup">
              <h2>{{ $t('Prosjekter') }}</h2>
              <slot name="links" />
            </div>
            <div :class="$style.otherLinksGroup">
              <h2>{{ $t('Diverse') }}</h2>
              <slot name="links" />
            </div>
            <div :class="$style.otherLinksGroup">
              <h2>{{ $t('Sosiale medier') }}</h2>
              <slot name="links" />
            </div>
            <div :class="$style.otherLinksGroup">
              <h2>{{ $t('Kontakt') }}</h2>
              <slot name="links" />
            </div>
          </div>
        </div>
      </div>
      <div :class="$style.toggle" @click="toggleMenu">
        <slot name="toggle" />
      </div>
    </div>
  </nav>
</template>
<script>
import CloseIcon from '~/assets/icons/close.svg?inline'
export default {
  components: {
    CloseIcon
  },
  methods: {
    toggleMenu() {
      this.$store.commit('navigation/toggle')
    }
  },
  watch: {
    $route() {
      // Make sure the sidebar closes when route changes
      if (this.$store.state.navigation.navExtended) {
        this.$store.commit('navigation/toggle')
      }
    }
  }
}
</script>
