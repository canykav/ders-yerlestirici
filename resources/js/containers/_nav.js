export default [
  {
    _name: 'CSidebarNav',
    _children: [
      {
        _name: 'CSidebarNavItem',
        name: 'Genel Bakış',
        to: '/dashboard',
        icon: 'cil-speedometer',
      },
      {
        _name: 'CSidebarNavTitle',
        _children: ['Program']
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Günler ve Saatler',
        to: '/saatler',
        icon: 'cil-clock'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Öğretmenler',
        to: '/ogretmenler',
        icon: 'cil-contact'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Bölümler',
        to: '/bolumler',
        icon: 'cil-school'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Derslikler',
        to: '/derslikler',
        icon: 'cil-room'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Dersler',
        to: '/dersler',
        icon: 'cil-book'
      },
      {
        _name: 'CSidebarNavItem',
        name: 'Ders Programı',
        to: '/program',
        icon: 'cil-spreadsheet'
      },
    ]
  }
]