package com.barterin.barterinapps.viewmodel

import android.content.Context
import androidx.lifecycle.ViewModel
import androidx.lifecycle.ViewModelProvider
import com.barterin.barterinapps.data.BarterinRepository
import com.barterin.barterinapps.di.Injection
import com.barterin.barterinapps.ui.addaddress.AddAddressViewModel
import com.barterin.barterinapps.ui.addresslist.AddressViewModel
import com.barterin.barterinapps.ui.emailverification.EmailVerificationActivity
import com.barterin.barterinapps.ui.emailverification.EmailVerificationViewModel
import com.barterin.barterinapps.ui.login.LoginViewModel
import com.barterin.barterinapps.ui.register.RegisterViewModel
import com.barterin.barterinapps.ui.updateaddress.UpdateAddressViewModel
import com.barterin.barterinapps.ui.updateprofile.UpdateProfileViewModel

class ViewModelFactory private constructor(private val barterinRepository: BarterinRepository) :
    ViewModelProvider.NewInstanceFactory() {
    @Suppress("UNCHECKED_CAST")
    override fun <T : ViewModel> create(modelClass: Class<T>): T {
        if (modelClass.isAssignableFrom(LoginViewModel::class.java)) {
            return LoginViewModel(barterinRepository) as T
        }
        if (modelClass.isAssignableFrom(RegisterViewModel::class.java)) {
            return RegisterViewModel(barterinRepository) as T
        }
        if (modelClass.isAssignableFrom(EmailVerificationViewModel::class.java)) {
            return EmailVerificationViewModel(barterinRepository) as T
        }
        if (modelClass.isAssignableFrom(AddAddressViewModel::class.java)) {
            return AddAddressViewModel(barterinRepository) as T
        }
        if (modelClass.isAssignableFrom(AddressViewModel::class.java)) {
            return AddressViewModel(barterinRepository) as T
        }
        if (modelClass.isAssignableFrom(UpdateAddressViewModel::class.java)) {
            return UpdateAddressViewModel(barterinRepository) as T
        }
        if (modelClass.isAssignableFrom(UpdateProfileViewModel::class.java)) {
            return UpdateProfileViewModel(barterinRepository) as T
        }
        throw IllegalArgumentException("Unknown ViewModel class: " + modelClass.name)
    }

    companion object {
        @Volatile
        private var instance: ViewModelFactory? = null
        fun getInstance(context: Context): ViewModelFactory =
            instance ?: synchronized(this) {
                instance ?: ViewModelFactory(Injection.provideRepository(context))
            }.also { instance = it }
    }
}