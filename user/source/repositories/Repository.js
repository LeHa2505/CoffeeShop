import UserContactRepository from '~/repositories/UserContactRepository.js'
import ProductRepository from '~/repositories/ProductRepository'

export default ($axios) => ({
  userContact: UserContactRepository($axios),
  product: ProductRepository($axios),
})
