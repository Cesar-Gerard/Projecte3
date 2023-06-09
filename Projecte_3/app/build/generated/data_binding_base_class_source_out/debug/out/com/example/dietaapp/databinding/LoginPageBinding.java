// Generated by view binder compiler. Do not edit!
package com.example.dietaapp.databinding;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.TextView;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.viewbinding.ViewBinding;
import androidx.viewbinding.ViewBindings;
import com.example.dietaapp.R;
import java.lang.NullPointerException;
import java.lang.Override;
import java.lang.String;

public final class LoginPageBinding implements ViewBinding {
  @NonNull
  private final LinearLayout rootView;

  @NonNull
  public final Button btnLog;

  @NonNull
  public final EditText edtName;

  @NonNull
  public final EditText edtPassword;

  @NonNull
  public final TextView loginText;

  @NonNull
  public final ProgressBar progressBar;

  @NonNull
  public final TextView singuptext;

  private LoginPageBinding(@NonNull LinearLayout rootView, @NonNull Button btnLog,
      @NonNull EditText edtName, @NonNull EditText edtPassword, @NonNull TextView loginText,
      @NonNull ProgressBar progressBar, @NonNull TextView singuptext) {
    this.rootView = rootView;
    this.btnLog = btnLog;
    this.edtName = edtName;
    this.edtPassword = edtPassword;
    this.loginText = loginText;
    this.progressBar = progressBar;
    this.singuptext = singuptext;
  }

  @Override
  @NonNull
  public LinearLayout getRoot() {
    return rootView;
  }

  @NonNull
  public static LoginPageBinding inflate(@NonNull LayoutInflater inflater) {
    return inflate(inflater, null, false);
  }

  @NonNull
  public static LoginPageBinding inflate(@NonNull LayoutInflater inflater,
      @Nullable ViewGroup parent, boolean attachToParent) {
    View root = inflater.inflate(R.layout.login_page, parent, false);
    if (attachToParent) {
      parent.addView(root);
    }
    return bind(root);
  }

  @NonNull
  public static LoginPageBinding bind(@NonNull View rootView) {
    // The body of this method is generated in a way you would not otherwise write.
    // This is done to optimize the compiled bytecode for size and performance.
    int id;
    missingId: {
      id = R.id.btn_Log;
      Button btnLog = ViewBindings.findChildViewById(rootView, id);
      if (btnLog == null) {
        break missingId;
      }

      id = R.id.edtName;
      EditText edtName = ViewBindings.findChildViewById(rootView, id);
      if (edtName == null) {
        break missingId;
      }

      id = R.id.edtPassword;
      EditText edtPassword = ViewBindings.findChildViewById(rootView, id);
      if (edtPassword == null) {
        break missingId;
      }

      id = R.id.loginText;
      TextView loginText = ViewBindings.findChildViewById(rootView, id);
      if (loginText == null) {
        break missingId;
      }

      id = R.id.progressBar;
      ProgressBar progressBar = ViewBindings.findChildViewById(rootView, id);
      if (progressBar == null) {
        break missingId;
      }

      id = R.id.singuptext;
      TextView singuptext = ViewBindings.findChildViewById(rootView, id);
      if (singuptext == null) {
        break missingId;
      }

      return new LoginPageBinding((LinearLayout) rootView, btnLog, edtName, edtPassword, loginText,
          progressBar, singuptext);
    }
    String missingId = rootView.getResources().getResourceName(id);
    throw new NullPointerException("Missing required view with ID: ".concat(missingId));
  }
}
