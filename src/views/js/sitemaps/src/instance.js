import axios from 'axios';

const instance = axios.create({
    baseURL: `/`,
    headers: {'content-type': 'application/json', 'Accept': 'application/json',},

});
export default instance