// import Swal from "sweetalert2";

// document.querySelectorAll(".btn-excluir").forEach(button =>{
//     button.addEventListener('click',function(){
//         const form = this.closet('form');
//         // const nome = this.dataset.nome;
    
// Swal.fire({
//   title: "Are you sure?",
//   text: "You won't be able to revert this!",
//   icon: "warning",
//   showCancelButton: true,
//   confirmButtonColor: "#3085d6",
//   cancelButtonColor: "#d33",
//   confirmButtonText: "Yes, delete it!"
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire({
//       title: "Deleted!",
//       text: "Your file has been deleted.",
//       icon: "success"
//     }).then(()=>{
//         form.submit();
//     });
//   }
// })
// })})

import Swal from 'sweetalert2';

document.querySelectorAll('.btn-excluir').forEach(button => {
  button.addEventListener('click', function() {
    const form = this.closest('form');
    const nome = this.dataset.nome;

    Swal.fire({
      title: `Tem certeza que deseja excluir "${nome}"?`,
      text: "Você não poderá reverter isso!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sim, excluir!"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Excluído!',
          `"${nome}" foi excluído com sucesso.`,
          'success'
        ).then(() => {
          form.submit();
        });
      }
    });
  });
});