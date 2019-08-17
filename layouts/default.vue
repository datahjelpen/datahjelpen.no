<style lang="scss" module>
@import 'default';
</style>
<template>
  <div>
    <nav>
      <logo />
      <a>Link 1</a>
      <a>Link 2</a>
      <a>Link 3</a>
    </nav>
    <main>
      <nuxt />
    </main>
    <footer>
      <a>Link 1</a>
      <a>Link 2</a>
      <a>Link 3</a>
    </footer>
  </div>
</template>
<script>
import Logo from '~/components/Logo'

export default {
  components: {
    Logo
  }
}
</script>