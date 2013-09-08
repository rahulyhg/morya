/*
 * Copyright (C) 2013 Devaganesha
 */
package com.devaganesha.devaganeshapics.provider;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.os.AsyncTask;
import android.util.Log;

import com.devaganesha.devaganeshapics.ui.ImageGridFragment;

public class Images {

    /**
     * This are Devaganesha URLs. 
     */
	public static ArrayList<String> imageUrls_ = new ArrayList<String>();
	public static String[] imageUrls = new String[] {
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",};
	
	/**
     * This are Devaganesha thumbnail URLs. 
     */
	public static ArrayList<String> imageThumbUrls_ = new ArrayList<String>();
    public static String[] imageThumbUrls = new String[] {
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",};
    
    private JSONParser jsonParser;
    
    public void loadImages(String url) {
    	jsonParser = new JSONParser();
    	
    	try {
			JSONObject json = jsonParser.execute(url).get();
			
			JSONArray pics = json.getJSONArray("pics");

            // looping through All Pics
            for(int i = 0; i < pics.length(); i++){
                JSONObject p = pics.getJSONObject(i);

                // Storing each json item in variable
                String mini = p.getString("mini");
                String thumb = p.getString("thumb");
                imageThumbUrls_.add(mini);
                imageUrls_.add(thumb);
            }
            imageUrls = imageUrls_.toArray(new String[imageUrls_.size()]);
            imageThumbUrls = imageThumbUrls_.toArray(new String[imageThumbUrls_.size()]);
		} catch (InterruptedException e) {
			e.printStackTrace();
		} catch (ExecutionException e) {
			e.printStackTrace();
		} catch (JSONException e) {
			e.printStackTrace();
		}
    }
    
    public class JSONParser extends AsyncTask<String, Void, JSONObject> {

    	InputStream is = null;
    	JSONObject json = null;
    	String outPut = "";

    	// constructor
    	public JSONParser() {

    	}
    	
    	/*protected void onPreExecute() {

            // CHANGE THE LOADING MORE STATUS
    		ImageGridFragment.loadingMore = false;
        }*/

    	@Override
    	protected JSONObject doInBackground(String... params) {
    		String url = params[0];

    		// Making the HTTP request
    		try {
    			
    			DefaultHttpClient httpClient = new DefaultHttpClient();
    			HttpPost httpPost = new HttpPost(url);
    			//httpPost.setEntity(new UrlEncodedFormEntity(params));

    			HttpResponse httpResponse = httpClient.execute(httpPost);
    			HttpEntity httpEntity = httpResponse.getEntity();
    			is = httpEntity.getContent();

    		} catch (Exception e) {
    			e.printStackTrace();
    		}

    		try {
    			BufferedReader in = new BufferedReader(new InputStreamReader(
    					is, "iso-8859-1"), 8);
    			StringBuilder sb = new StringBuilder();
    			String line = null;
    			while ((line = in.readLine()) != null) {
    				sb.append(line + "\n");
    			}
    			is.close();
    			outPut = sb.toString();
    			//Log.e("JSON", outPut);
    		} catch (Exception e) {
    			Log.e("Buffer Error", "Error converting result " + e.toString());
    		}

    		try {
    			json = new JSONObject(outPut);			
    		} catch (JSONException e) {
    			Log.e("JSON Parser", "Error parsing data " + e.toString());
    		}

    		// return JSON String
    		return json;
    	}
    	
    	protected void onPostExecute(JSONObject result) {

            // CHANGE THE LOADING MORE STATUS
    		ImageGridFragment.loadingMore = false;
        }
    }
}
