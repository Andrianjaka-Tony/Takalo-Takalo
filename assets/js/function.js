export function getXHr() {
  return new XMLHttpRequest;
}
export function site_url(url = "") {
  return `http://localhost/ci306/${url}`;
}