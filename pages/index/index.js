// pages/index/index.js
const app = getApp();
const util = require('../../utils/utils.js')
Page({

  /**
   * 页面的初始数据
   */
  data: {
    motto: "在这里\n拥抱所有热情",

    
    indicatorDots: true, //是否显示面板指示点
    autoplay: true, //自动轮播
    interval: 7000, // 自动切换时间间隔
    duration: 1000, // 滑动动画时长
    circular: true, //是否采用衔接滑动 
    banners: [],


    itemsShow: [], //热映
    pageNumHost: 0,//加载“页号”
    limit: 100,
    hasMoreHost: true,
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this
    that.getMovieList();
    // 轮播图数据
    wx.request({
      url: app.globalData.serverAddress + 'function/wx/banner.php',
      data:{
      },
      success:(res)=>{
        console.log(res.data);
        this.setData({
          banners: res.data
        })
      }
    })

 
  },
  getMovieList: function() {
    var that = this;
    var pageNumHost = that.data.pageNumHost;
    var limit = that.data.limit;
    //playingList
    wx.request({
      url:  app.globalData.serverAddress +'function/wx/get_show_list.php',
      method: 'GET',
      data: {
        pageNum: pageNumHost++,
        limit: limit
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        console.log(res.data);
        const itemsShow = that.data.itemsShow.concat(res.data);
        that.setData({
          // hasMoreHost: pageNumHost < res.data.data.tr,
          itemsShow: itemsShow,
          pageNumHost: pageNumHost
        })
      }
    })
  },
  // 触底
  onReachBottom: function(){
    if (this.data.hasMoreHost)
      this.getMovieList();
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
    
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  },
  onShareTimeline(){
    return{
      title:'看票'
    }
  }

})