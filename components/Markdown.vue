<template>
  <div v-html="markdown">
    <slot />
  </div>
</template>
<script>
import MarkdownIt from 'markdown-it'

const md = new MarkdownIt({
  breaks: true
})
export default {
  data() {
    return {
      markdown: md.render(this.$slots.default[0].text)
    }
  }
}
</script>
