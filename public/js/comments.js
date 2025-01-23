const commentTextarea = document.querySelector('textarea');

if(commentTextarea) {
    commentTextarea.value = '';
    commentTextarea.style.height = `${commentTextarea.style.scrollHeight}px`;
    commentTextarea.addEventListener("input", OnInput, false);
}
function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}
