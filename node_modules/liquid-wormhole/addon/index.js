import Constraint from 'liquid-fire/constraint';

export function target(name) {
  return new Constraint('parentElementClass', `${name}-liquid-target`);
}

export function onOpenWormhole() {
  return new Constraint('newValue', ({ emptyTarget }) => !emptyTarget);
}

export function onCloseWormhole() {
  return new Constraint('newValue', ({ emptyTarget }) => emptyTarget);
}
