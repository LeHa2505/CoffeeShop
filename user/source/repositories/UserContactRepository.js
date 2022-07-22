const resource = 'contact'

export default ($axios) => ({
  create(payload) {
    return $axios.post(`${resource}`, payload)
  }
});