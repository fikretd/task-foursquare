<template>
  <div class="col-7 col-sm-7 col-lg-8 col-xl-9 text-left">
    <div v-if="storeState.Places" id="recommendations">
        <!-- <div class="title">Suggestions for <strong>{{storeState.Places.geocode.displayString}}</strong> Arama: <strong>{{storeState.Places.query}}</strong></div> -->
        <div class="title">"<strong>{{storeState.Places.query}}</strong>" için toplam <strong>{{storeState.Places.totalResults}}</strong> sonuç</div>
        <div v-if="storeState.Places.groups[0].items.length<=0" class="noresult">Sonuç bulunamadı</div>
        <div v-else class="media" v-for="item in storeState.Places.groups[0].items" v-bind:key="item.venue.id">
            <div class="media-body">
                <h4>{{item.venue.name}}</h4>
                <span v-for="category in item.venue.categories" v-bind:key="category.id" class="category">{{category.name}}</span>
                <div>{{item.venue.location.lat}}, {{item.venue.location.lng}}</div>
                <span v-if="item.venue.location.city">{{item.venue.location.city}},</span> <span v-if="item.venue.location.state">{{item.venue.location.state}},</span> <span>{{item.venue.location.country}}</span>
            </div>
        </div>
    </div>
    <div v-else>{{storeState.LoadingMsg}}</div>
  </div>
</template>

<script>
import {store} from '../store.js'

export default {
  name: 'Places',
  data(){
      return{
          storeState: store.state,
      };
  },
  beforeMount(){
      if (!this.storeState.Places) {
          this.storeState.LoadingMsg = 'Mekan önerilerini görmek için kategori seçin'
      }
  },
}
</script>

