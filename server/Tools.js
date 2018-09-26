'use strict'

class Tools {
  constructor() {
  };

  static getCurrentDate() {
      let currentDate = new Date();
      let dd = currentDate.getDate();
      let mm = currentDate.getMonth()+1; 
      let yyyy = currentDate.getFullYear();

          if(dd<10) {
            dd = '0'+dd
          }

          if(mm<10) {
            mm = '0'+mm
          }

      currentDate = yyyy + '-' + mm + '-' + dd;
      return currentDate;
  }

}


module.exports = Tools;
