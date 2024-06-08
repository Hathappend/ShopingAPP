function success(message){

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast',
      },
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    })

    ;(async () => {
      await Toast.fire({
        icon: 'success',
        title: message,
      })
    })()
}
