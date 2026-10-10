import { describe, it, expect } from 'vitest';
import { formatProjectLabel } from './format';

describe('formatProjectLabel', () => {
  it('formats a project with title and engine', () => {
    const result = formatProjectLabel({ title: 'Bracelet of Words', engine: 'Unreal Engine 5' });
    expect(result).toBe('Bracelet of Words (Unreal Engine 5)');
  });

  it('returns Untitled when project has no title', () => {
    expect(formatProjectLabel({})).toBe('Untitled');
  });
});