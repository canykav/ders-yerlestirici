<template>
  <div>
     <CCardGroup class="mb-4">
      <CWidgetProgressIcon
        :header="stats.gun_sayisi"
        text="Ders Günü"
      >
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        :header="stats.ogretmen_sayisi"
        text="Öğretmen"
      >
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        :header="stats.bolum_sayisi"
        text="Bölüm"
      >
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        :header="stats.ders_sayisi"
        text="Ders"
      >
      </CWidgetProgressIcon>
      <CWidgetProgressIcon
        :header="stats.derslik_sayisi"
        text="Derslik"
      >
      </CWidgetProgressIcon>
    </CCardGroup>
  </div>
</template>

<script>
export default {
  name: 'Dashboard',
  data () {
    return {
      stats: {},
    }
  },
  mounted(){
      this.getStats();
  },
  methods: {
    getStats() {
        axios.get('/api/stats')
        .then(response => {
            this.stats = response.data.data;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  }
}
</script>

<style >
.progress {
    display: none;
}
</style>
