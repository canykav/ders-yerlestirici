<template>
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
      <strong>Kullanıcı Adı</strong>
    </CDropdownHeader>
    <CDropdownItem>
      <CIcon name="cil-user" /> Profil
    </CDropdownItem>
    <CDropdownItem>
      <CIcon name="cil-settings" /> Ayarlar
    </CDropdownItem>
    <CDropdownDivider/>
    <CDropdownItem>
      <CIcon name="cil-lock-locked" /> Çıkış Yap
    </CDropdownItem>
  </CDropdown>
</template>

<script>
export default {
  name: 'TheHeaderDropdownAccnt',
  data () {
    return { 
      itemsCount: 42
    }
  }
}
</script>

<style scoped>
  .c-icon {
    margin-right: 0.3rem;
  }
</style>