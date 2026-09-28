export function formatProjectLabel(project) {
  if (!project || !project.title) return 'Untitled';
  return `${project.title} (${project.engine})`;
}