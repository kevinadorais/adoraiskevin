var config = {
  type: Phaser.AUTO,
  width: 1200,
  height: 600,
  scene: {
      preload: preload,
      create: create,
      update: update
  },
  title: 'One VS One'
};

var game = new Phaser.Game(config);

function preload ()
{
  this.load.image('loadBar', 'game/assets/loadBar.png');
  this.load.image('background', 'game/assets/background.jpg');
  this.load.image({
    key: 'lebronJames',
    url: 'game/assets/lebronjames.png',
    name: 'Lebron James',
  });
  this.load.image({
    key: 'kevinDurant',
    url: 'game/assets/kevindurant.png',
    name: 'Kevin Durant'
  });
}

function create ()
{
  this.add.image(600, 300, 'background');
  this.add.sprite(300, 300, 'lebronJames', { width: 32, height: 48 });
  this.add.sprite(900, 300, 'kevinDurant');
  this.add.text(475, 75, game.config.gameTitle, { font: '50px Courier bold', fill: '#ffffff' });
}

function update ()
{
}