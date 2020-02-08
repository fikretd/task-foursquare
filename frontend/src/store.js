import axios from 'axios'

export const store = {
    state: {
      Categories: [],
      Places: null,
      LoadingMsg: '',
      apiurl: 'http://127.0.0.1:8000',
    },
    getCategories()
    {
        let $this = this;

        axios
        .get(this.state.apiurl+'/category')
        .then(function(response){
            if (response && response.status == 200) {
                $this.state.Categories = response.data.response.categories;
            }
            else {
                console.log(response)
            }
        })
        .catch((err) => {
            console.log(err.response);
        })
    },
    getPlaces(category_name)
    {
        let $this = this;

        $this.state.LoadingMsg = 'Yükleniyor';

        axios
        .get(this.state.apiurl+'/explore/'+encodeURIComponent(category_name))
        .then(function(response){
            if (response.status == 200) {
                $this.state.Places = response.data.response;
                $this.state.LoadingMsg = '';
            } else {
                $this.$state.LoadingMsg = response.statusText;
            }
        })
        .catch(function(err){
            $this.state.LoadingMsg = err.response.statusText;
        })
    }
}