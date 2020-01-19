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
    <h1 v-if="page.heading">{{ page.heading }}</h1>
    <p v-if="page.intro">{{ page.intro }}</p>
    <div :class="$style.cards" v-if="items">
      <div
        :class="$style.cardWrapper"
        v-for="(post, i) in items"
        :key="'post-card-' + i"
      >
        <Layout type="cols-2" :vAlign="alignment">
          <nuxt-link
            :to="
              localePath({
                name: 'blog-slug',
                params: { slug: i }
              })
            "
          >
            <img :src="post.poster" :alt="post.title" />
          </nuxt-link>
          <div>
            <nuxt-link
              :to="
                localePath({
                  name: 'blog-slug',
                  params: { slug: i }
                })
              "
            >
              <h3>{{ post.title }}</h3>
            </nuxt-link>
            <p>{{ post.summary }}</p>
          </div>
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
    const data = await $axios
      .get(url)
      .then(res => {
        res.data.page = {
          heading: i18n.t('Databloggen')
        }
        return res.data
      })
      .catch(e => {
        return {
          page: {
            heading: i18n.t('Databloggen'),
            intro: i18n.t('Noe gikk feil. Vi klarte ikke hente data ...')
          }
        }
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
