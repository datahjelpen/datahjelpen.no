export const state = () => ({
  headerTitle: []
})

export const mutations = {
  setHeaderTitle(state, headerTitle) {
    state.headerTitle = headerTitle
  }
}
