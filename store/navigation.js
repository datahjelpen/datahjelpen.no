export const state = () => ({
  navExtended: false
})

export const mutations = {
  toggle(state) {
    state.navExtended = !state.navExtended
  }
}
