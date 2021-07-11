<template>
<div>
  <CDropdown
    inNav
    class="c-header-nav-items"
    placement="bottom-end"
    add-menu-classes="pt-0"
  >
    <template #toggler>
      <CHeaderNavLink>
        <div class="c-avatar">
          <img
            src="img/blank-profile.png"
            class="c-avatar-img"
          />
        </div>
      </CHeaderNavLink>
    </template>
    <CDropdownHeader
      tag="div"
      class="text-center"
      color="light"
    >
      <strong>Kullanıcı Ayarları</strong>
    </CDropdownHeader>
    <CDropdownItem onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <CIcon name="cil-lock-locked" /> Çıkış Yap
    </CDropdownItem>
  </CDropdown>
     <form id="logout-form" action="/logout" method="POST" style="display:none;">
        <input type="hidden" name="_token" :value="csrf">
    </form>
  </div>
  
</template>

<script>
export default {
  name: 'TheHeaderDropdownAccnt',
  data () {
    return { 
      itemsCount: 42,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  },
  methods: {
    submit(){
        this.$refs.form.submit();
    },
  }
}
</script>

<style scoped>
  .c-icon {
    margin-right: 0.3rem;
  }
</style>