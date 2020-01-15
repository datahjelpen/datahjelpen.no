<style lang="scss" module>
.root {
  margin: $space-large auto;
}

.root > h1 {
  text-align: center;
  margin-bottom: $space-medium;
}

.cards {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  margin-left: -$space-small;
  margin-right: -$space-small;

  @media ($media-min-medium) {
    margin-left: -$space-base;
    margin-right: -$space-base;
  }
}

.cardWrapper {
  width: 50%;
  padding: $space-base 0;
  width: (100%);

  @media ($media-min-medium) {
    padding: $space-medium 0;
  }
}
</style>
<template>
  <Layout :class="$style.root">
    <h1>{{ $t('Databloggen') }}</h1>
    <div :class="$style.cards">
      <div
        :class="$style.cardWrapper"
        v-for="(post, i) in items"
        :key="'post-card-' + i"
      >
        <Layout type="cols-2" :vAlign="alignment">
          <nuxt-link :to="post.link">
            <img :src="post.poster" :alt="post.title" />
          </nuxt-link>
          <div>
            <nuxt-link :to="post.link">
              <h3>{{ post.title }}</h3>
            </nuxt-link>
            <p>{{ post.summary }}</p>
          </div>

          <!-- <a class="link link-styled" :href="post.link" slot="link">{{
            post.linkText
          }}</a> -->
        </Layout>
      </div>
    </div>
  </Layout>
</template>
<script>
import Layout from '../../components/Layout'
import Card from '../../components/Card'

export default {
  head() {
    return {
      title: 'Databloggen - Datahjelpen AS'
    }
  },
  components: {
    Layout,
    Card
  },
  async asyncData({ app: { $axios, i18n } }) {
    const url = '/i18n/' + i18n.locale + '/blog.json'
    const data = await $axios.get(url).then(res => {
      return res.data
    })

    return data
  },
  data() {
    return {
      alignment: ['', 'center']
    }
  },
  nuxtI18n: {
    paths: {
      en: '/blog',
      nb: '/blogg'
    }
  }
}
</script>
