type User = {
    id: number,
    name: string,
    avatar: string,
    email: string,
    created_at: Date
    email_verified_at: Date,
    info: {
        avatar: string,
        street: string,
        facebook: string,
        google: string,
        instagram: string,
        post_user_avatar: string
    }

}

export default User;
