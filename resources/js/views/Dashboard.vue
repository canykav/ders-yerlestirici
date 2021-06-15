<template>
  <div>
    <WidgetsDropdown/>

  </div>
</template>

<script>
import MainChartExample from './charts/MainChartExample'
import WidgetsDropdown from './widgets/WidgetsDropdown'

export default {
  name: 'Dashboard',
  components: {
    MainChartExample,
    WidgetsDropdown,
  },
  data () {
    return {
      selected: 'Month',

    }
  },
  methods: {
    color (value) {
      let $color
      if (value <= 25) {
        $color = 'info'
      } else if (value > 25 && value <= 50) {
        $color = 'success'
      } else if (value > 50 && value <= 75) {
        $color = 'warning'
      } else if (value > 75 && value <= 100) {
        $color = 'danger'
      }
      return $color
    }
  }
}
</script>
