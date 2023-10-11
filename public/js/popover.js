export function ativarPopover(id){
  const popover = document.getElementById('popover-content-' + id);
  const popoverButton = document.getElementById('popover-button-' + id);

  popoverButton.addEventListener('mouseover', () => {
    popover.classList.remove('opacity-0', 'invisible');
  });

  popoverButton.addEventListener('mouseout', () => {
    popover.classList.add('opacity-0', 'invisible');
  });
}