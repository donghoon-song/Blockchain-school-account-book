'use strict';
class QrReader {
    constructor() {
      this.squareWidthInPixels = 50;
      this.squareHeightInPixels = 50;
      this.width = 1000;         // default: 800
      this.height = 800;
      this.playerSpriteWidth = 50;
      this.playerSpriteHeight = 50;
      this.mode = 'alive';
      this.padding = 50;
  }

  newPlayer() {
