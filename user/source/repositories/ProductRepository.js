const resource = 'product'

export default ($axios) => ({
  getAll() {
    return $axios.get(`${resource}`)
  },
  getFavoriteProduct() {
    return $axios.get(`${resource}/favorite`)
  },
  getProduct(id) {
    return $axios.get(`${resource}/${id}`)
  },
})
