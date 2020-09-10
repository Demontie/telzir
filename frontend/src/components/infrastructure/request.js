import axios from 'axios'

axios.interceptors.response.use(function (response) {
  const axiosResponse = response.data

  if (axiosResponse.data) {
    return axiosResponse.data
  }

  return axiosResponse
})

const baseUrl = 'http://localhost:8080/clients'

const get = (url = '', config = {}) => axios.get(`${baseUrl}${url}`, config)

const post = (url = '', data = {}, config = {}) => {
  return axios.post(`${baseUrl}${url}`, data, config)
}

const put = (url = '', data = {}, config = {}) => {
  return axios.put(`${baseUrl}${url}`, data, config)
}

const del = (url = '', data = {}, config = {}) => {
  return axios.delete(`${baseUrl}${url}`, data, config)
}

export { get, post, put, del }
