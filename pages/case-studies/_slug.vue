<style lang="scss" module>
// @import 'single';
</style>
<template>
  <div :class="$style.root">
    <Layout type="full">
      <Header>
        <div>
          <h1>{{ item.title }}</h1>
          <p>{{ item.summary }}</p>
        </div>
        <div>
          <dl>
            <dt>Date</dt>
            <dd>{{ item.slug }}</dd>

            <dt>Client</dt>
            <dd>{{ item.slug }}</dd>
          </dl>
        </div>
        <img :src="item.image" alt="" />
      </Header>
    </Layout>

    <div :class="'navigationBarBg ' + $style.navigationBarBg"></div>

    <Layout>
      <InfoSection1>
        <div slot="header">
          <h2 data-aos="fade-up" data-aos-delay="0">
            lorem ipsum
          </h2>
          <h3 data-aos="fade-up" data-aos-delay="100">
            lorem ipsum
          </h3>
        </div>
        <div slot="content" data-aos="fade-up" data-aos-delay="200">
          <p>
            lorem ipsum
          </p>
        </div>
        <div
          slot="footer"
          data-aos="fade-up"
          data-aos-delay="300"
          data-aos-offset="-100"
        >
          <a class="button button-primary" :href="'#'">Lorem ipsum</a>
        </div>
      </InfoSection1>
    </Layout>
  </div>
</template>

<script>
import InfoSection1 from '../../components/InfoSection1'
import Layout from '../../components/Layout'

export default {
  components: {
    InfoSection1,
    Layout
  },
  async asyncData({ app: { $axios, i18n }, params }) {
    const url = '/i18n/' + i18n.locale + '/case-studies.json'
    const data = await $axios.get(url).then(res => {
      return res.data
    })

    data.item = data.items[params.slug]
    data.item.slug = params.slug

    return { ...data }
  }
}
</script>
